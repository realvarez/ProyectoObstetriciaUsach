<template>
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">email</label>
                                <div class="col-md-6">
                                  <input type="text" v-model="email" class="form-control" placeholder="123@mail.com" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                  <input type="password" v-model="password" class="form-control" placeholder="constrasena" aria-label="Username" aria-describedby="basic-addon1">
                                </div> 
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary"  v-on:click="verify">
                                        Login
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
<script>
import Axios from 'axios';
export default {
    created() {
        console.log('Component mounted.')
        Axios.get('http://localhost/api/users/')
            .then(response => {
                this.userdata = response.data;
            }).catch(function (error) {
                console.log(error);
        });
    },
    data(){
        return{
            email: '',
            password: '',
            userdata: null
        };
    },
    methods:{
        verify(){
            console.log(this.userdata)
                var mailConfirmation = null;
                for (let user of this.userdata) {
                    console.log(user);
                    if (this.email === user.email) {
                        mailConfirmation = true
                        break;
                    }
                }
                if(mailConfirmation){
                    alert('Se encontro el mail')
                }
                else{
                    alert('No esta el mail')
                }
        }
    },
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
