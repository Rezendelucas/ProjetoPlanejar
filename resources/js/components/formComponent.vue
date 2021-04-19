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
                                <input type="text" class="form-control" id="enterInput" name="enter" v-model="hourEnter">
                            </div>
                            <div class="mb-3" style="width: 15vw">
                                <label for="exitInput" class="form-label">Saida:</label>
                                <input type="text" class="form-control" id="exitInput" name="exit" v-model="hourExit">
                            </div>
                            <button class="mybutton" id="button-calc">Calcular</button>
                        </div>
                    </form>
                </div>

                <div class="col-9" id="result-table" v-if="registers.length > 0">
                    <h4 style="color: var(--main-strong-blue)">Horas trabalhadas:</h4>
                    <table class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Funcionario</th>
                            <th scope="col">Data</th>
                            <th scope="col">Diurno</th>
                            <th scope="col">Noturno</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(register, index) in registers" :key="register.id">
                            <td>{{register.name}}</td>
                            <td>{{register.date}}</td>
                            <td>{{register.day}}</td>
                            <td>{{register.night}}</td>
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
                nameFunc: '',
                hourEnter: '',
                hourExit: '',
                registers: [],
                id: '',
                name: '',
                date: '',
                day: '',
                night: ''
            }
        }
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
