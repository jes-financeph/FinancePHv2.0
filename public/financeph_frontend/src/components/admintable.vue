<template>
  <v-data-table
    dark
    :headers="headers"
    :items="Users"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</template>

<script>
export default {
  props: {
    userdata: Array
  },
  data() {
    return {
      headers: [
        {
          text: "Users in Database",
          align: "start",
          sortable: false,
          value: "name"
        },
        { text: "ID", value: "id" },
        { text: "Email address", value: "email" },
        { text: "Status", value: "Status" },
        { text: "Last Log-in", value: "LastVisit" }
      ],
      Users: this.userdata
    };
  },
  created() {
    console.log(Users);
  }
};
</script>