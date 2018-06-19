<template>
  <input id="file" type="file" ref="imageFile" @change="uploadImage" accept=".jpg, .jpeg, .png">
</template>
<script>
export default {
  props: {
    url: {
      type: String,
    },
  },
  methods: {
    uploadImage() {
      const formData = new FormData();
      formData.append('image', this.$refs.imageFile.files[0]);
      axios.post(this.url,
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        },
      ).then((response) => {
        this.$emit('image-uploaded', response.data);
      }).catch(function (error) {
        console.log(error);
      });;
    },
  },
}
</script>
