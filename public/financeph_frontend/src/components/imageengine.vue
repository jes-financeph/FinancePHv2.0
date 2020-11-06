
<template>
  <div>
    <v-container>
      <v-row justify="center">
        <div size="160" class="user">
          <v-img :src="currentImage" class="profile-img"></v-img>
          <v-icon
            class="icon primary white--text"
            @click="$refs.FileInput.click()"
            >mdi-upload</v-icon
          >
          <input
            ref="FileInput"
            type="file"
            style="display: none;"
            @change="onFileSelect"
          />
        </div>
      </v-row>
      <br>
      <v-row  justify="center">
        <p>Note: if the image doesn't update after you upload, please refresh the page.</p>
      </v-row>
      <v-row>
        <v-dialog v-model="dialog" width="500">
          <v-card>
            <br /><br />
            <v-card-text>
              <VueCropper
                v-show="selectedFile"
                ref="cropper"
                :src="selectedFile"
                alt="Source Image"
              >
              </VueCropper>
            </v-card-text>

            <v-card-actions>
              <v-btn class="primary" @click="saveImage(), (dialog = false)"
                >Crop</v-btn
              >
              <v-btn color="primary" text @click="dialog = false">Cancel</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import axios from "axios";
import VueCropper from "vue-cropperjs";
import "cropperjs/dist/cropper.css";
export default {
  components: { VueCropper },

  data() {
    return {
      mime_type: "",
      cropedImage: "",
      autoCrop: false,
      selectedFile: "",
      image: "",
      dialog: false,
      files: "",
      lastModifiedDate: "sometime",
      currentImage: null,
      id: null
    };
  },

  created() {
    const userToken = localStorage.getItem("token");
    const axiosHeader = {
      Authorization: `Bearer ${userToken}`
    };
    this.axios
      .post("http://127.0.0.1:8000/api/auth/me", "body", {
        headers: axiosHeader
      })
      .then(response => {
        if (response.data.photo !== null) {
          this.id = response.data.id;
          this.currentImage = require("../photodatabase/" +
            response.data.photo.slice(37, 56));
          console.log(response.data.photo); //Response = financeph_frontend/src/photodatabase/041120_18_26_22.jpg
        } else {
          this.id = response.data.id;
          this.currentImage = require("../photodatabase/111111_11_11_11.jpg");
          this.currentImage.slice(37, 56);
          console.log(this.currentImage); //Response = null
        }
      })
      .catch(error => {
        console.log(error);
      });
  },
  methods: {
    saveImage() {
      this.cropedImage = this.$refs.cropper.getCroppedCanvas().toDataURL();
      this.$refs.cropper.getCroppedCanvas().toBlob(Blob => {
        //

        const newImage = new File([Blob], "someName.jpg", {
          lastModified: this.lastModifiedDate,
          type: this.mime_type
        });
        console.log(newImage);

        //Form Data Here
        const formdata = new FormData();
        formdata.append("photo", newImage);

        //axios post here
        this.axios({
          method: "post",
          url: `http://127.0.0.1:8000/api/imageupload/${this.id}`,
          data: formdata,
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
          .then(response => {
            console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });
      }, this.mime_type);
    },
    onFileSelect(e) {
      const file = e.target.files[0];
      this.lastModifiedDate = file.lastModifiedDate;
      this.mime_type = file.type;
      console.log(file);
      if (typeof FileReader === "function") {
        this.dialog = true;
        const reader = new FileReader();
        reader.onload = event => {
          this.selectedFile = event.target.result;
          this.$refs.cropper.replace(this.selectedFile);
        };
        reader.readAsDataURL(file);
      } else {
        alert("Sorry, FileReader API not supported");
      }
    }
  }
};
</script>
<style scoped>
.user {
  width: 140px;
  height: 140px;
  border-radius: 100%;
  border: 3px solid #2e7d32;
  position: relative;
}
.profile-img {
  height: 100%;
  width: 100%;
  border-radius: 50%;
}
.icon {
  position: absolute;
  top: 10px;
  right: 0;
  background: #e2e2e2;
  border-radius: 100%;
  width: 30px;
  height: 30px;
  line-height: 30px;
  vertical-align: middle;
  text-align: center;
  color: #0000ff;
  font-size: 14px;
  cursor: pointer;
}
</style>