<template>
  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
    @submit.prevent="submitForm"
  >
   <v-select
      v-model="select_brand"
      :items="brand"

      label="Изготовитель"
      required
      :rules="[v => !!v || 'Указание бренда обязательно']"
    ></v-select>

    <v-select
      v-model="select_area"
      :items="area_room"

      label="Охлаждаемая площадь"
      required
      :rules="[v => !!v || 'Указание площади обязательно']"
    ></v-select>

        <v-file-input
            small-chips
            solo
            dense
            label="Загрузите шаблон заказа"
            prepend-icon
            append-icon
            light
            clearable
            v-model="selectedFiles"
            multiple
            :rules="[v => !!v || 'Добавление файла обязательно']"
          ></v-file-input>

    <v-btn
      type="submit"
      :disabled="!valid"
      color="success"
      class="mr-4"
      @click="validate"
    >
      Отправить
    </v-btn>

    <v-btn
      color="error"
      class="mr-4"
      @click="reset"
    >
      Сбросить
    </v-btn>


  </v-form>
</template>


<script>
  export default {
    data: () => ({
      selectedFiles: null,
      valid: true,
      select_brand: null,
      select_area: null,
      brand: [
         'Aero',
          'Aeronik',
          'Airwell',
          'Ballu',
          'Gree',
      ],
      area_room: [
          15,21,27,36,52
      ],
      checkbox: false,
    }),

    methods: {
      submitForm () {
          console.log(this.select_brand);
          console.log(this.select_area);

        const formData = new FormData();
            for (let file of this.selectedFiles) {
          formData.append("file", file, file.name);
         formData.append( "brand", this.select_brand);
          formData.append("area", this.select_area,);

           axios({
            method: "post",
            url: "/go",
            data: formData,
            headers: { "Content-Type": "multipart/form-data" }
          })
            .then(response => {
              console.log(response.data);
        });
            }
      },

      validate () {
        this.$refs.form.validate();

    },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
    },
  }
</script>
