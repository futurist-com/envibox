<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">Форма обратной связи</div>
          <div v-if="success" class="alert alert-success" role="alert">
            {{success}}
          </div>
          <div class="card-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text widch_span" id="inputGroup-sizing-default">Телефон</span>
              </div>
              <input
                type="text"
                class="form-control"
                aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default"
                v-model="phone"
              />
              <div v-for="err in errorsPhone" class="error">{{err}}</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text widch_span" id="inputGroup-sizing-default">E-mail</span>
              </div>
              <input
                type="text"
                class="form-control"
                aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default"
                v-model="email"
              />
              <div v-for="err in errorsEmail" class="error">{{err}}</div>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Текст сообщения</span>
              </div>
              <textarea class="form-control" aria-label="With textarea" v-model="message"></textarea>
            </div>
            <div class="input-group m-3">
              <button
                type="button"
                class="btn btn-primary"
                v-on:click="sendMessage"
              >Отправить сообщение</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      phone: null,
      email: null,
      message: "",
      errorsPhone: null,
      errorsEmail: null,
      success: null
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    sendMessage: function() {
      axios
        .post("api/send-message", {
          phone: this.phone,
          email: this.email,
          message: this.message
        })
        .then(resp => {
          this.errorsEmail = null
          this.errorsPhone = null
          this.email = null
          this.phone = null
          this.message = null
          this.success = resp.data.message
        })
        .catch(error => {
          this.success = null;
          this.errorsEmail = error.response.data.errors.email
          this.errorsPhone = error.response.data.errors.phone
          
        });
    }
  }
};
</script>
<style scoped>
.widch_span {
  width: 140px;
}
.error {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #e3342f;
}
</style>