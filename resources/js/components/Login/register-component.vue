<template>
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrarse </div>

                    <div class="card-body">
                        <form>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                  <input v-model= "name" type="text" class="form-control" placeholder="usuario" aria-label="usuario" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                  <input v-model= "email" type="text" class="form-control" placeholder="123@mail.com" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Contrasena</label>

                                <div class="col-md-6">
                                  <input v-model= "password" type="text" class="form-control" placeholder="contrasena" aria-label="Username" aria-describedby="basic-addon1">

                                </div>
                            </div>

                             <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Confirmar contrasena</label>

                                <div class="col-md-6">
                                  <input v-model= "passwordConfirm" type="text" class="form-control" placeholder="contrasena" aria-label="Username" aria-describedby="basic-addon1">

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" v-on:click= "register" >
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<<script>
  export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name: '',
                email: '',
                password: '',
                passwordConfirm: ''
            };
        },
        methods: {


            register(){
                console.log(this.name)
                //No funciona todavia
                /*Axios.post('http://localhost/api/users/')
                     .then(response => {

                         })
                        .catch(function (error) {
                            console.log(error);
            });
        */

            }

        }
    }
</script>

 <style scoped>
    .full-height {
        height: 100vh;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .position-ref {
        position: relative;
    }
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }
    .content {
        text-align: center;
    }
    .title {
        font-size: 60px;
    }
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .m-b-md {
        margin-bottom: 30px;
        color: #000000;
    }
    </style>
