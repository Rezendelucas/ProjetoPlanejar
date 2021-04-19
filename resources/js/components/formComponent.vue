<template>
    <div class="container-fluid">
        <section id="form">
            <div class="row">
                <div class="col-3" id="form-table">
                    <form>
                        <h4>Nome do funcionário:</h4>
                        <div class="mb-3" style="width: 15vw">
                            <input type="text" class="form-control" id="funcInput" name="func"  v-model="nameFunc">
                        </div>
                        <div v-if="nameFunc.trim() !== '' ">
                            <h4>Insira seu periodo de trabalho:</h4>
                            <div class="mb-3" style="width: 15vw">
                                <label for="enterInput" class="form-label">Entrada:</label>
                                <input type="time" class="form-control" id="enterInput" name="enter" v-model="hourEnter" >
                            </div>
                            <div class="mb-3" style="width: 15vw">
                                <label for="exitInput" class="form-label">Saida:</label>
                                <input type="time" class="form-control" id="exitInput" name="exit" v-model="hourExit" v-mask="'##:##'">
                            </div>
                            <a v-on:click="calculate" class="mybutton" id="button-calc">Calcular</a>
                        </div>
                    </form>
                </div>

                <div class="col-9" id="result-table" v-if="mydata.length > 0">
                    <h4 style="color: var(--main-strong-blue)">Horas trabalhadas:</h4>
                    <table class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Funcionario</th>
                            <th scope="col">Data</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Saida</th>
                            <th scope="col">Diurno</th>
                            <th scope="col">Noturno</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(register, index) in mydata" :key="register.id">
                            <td>{{register.funcionario}}</td>
                            <td>{{register.created_at}}</td>
                            <td>{{register.entrada}}</td>
                            <td>{{register.saida}}</td>
                            <td>{{register.diurno}}</td>
                            <td>{{register.noturno}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>



            </div>
        </section>
     </div>
</template>

<script>
    export default {
        name: 'formComponente',
        data() {
            return{
                order: [],
                nameFunc: '',
                hourEnter: '',
                hourExit: '',
                mydata: [],
                funcionario: '',
                created_at: '',
                entrada: '',
                saida: '',
                diurno: '',
                noturno: '',
                info: null
            }
        },
        methods:{
            calculate(){
                axios.post(`/calculate_hours`, {
                    func: this.nameFunc,
                    enter: this.hourEnter,
                    exit:  this.hourExit
                })
                    .then(response => {
                        this.info = "Desabilitado!!!"
                        console.log(response.data)
                        //response.data.forEach(function (item) {
                            this.mydata = response.data;

                        //});
                    })
                    .catch(error => {
                        console.log(error)
                        console.log("Erro dispardo!")
                    })
                this.nameFunc = '';
                this.hourEnter = '';
                this.hourExit = '';
            }

        },

    }
</script>

<style>

    :root {
        --main-strong-blue: #08121e;
        --main-strong-red: #882d24;
    }

    #form {
        height: 100vh;
        padding: 50px;
        padding-top: 150px ;
        color: var(--main-strong-blue);

    }

    .mybutton{
        background-color: var(--main-strong-red);
        border-radius: 50px;
        padding: 5px 20px;
        border: 5px;
        color: var(--light);
        text-decoration: none;
        cursor: pointer;
    }

    #result-table{
        color: var(--light);
        width: 70vw;
        height: 40vh;
        border-radius: 50px;
        padding: 30px;
        justify-content: center;
    }


    #form-table{
        padding: 30px;
    }

</style>
