<template>
    <div class="container-fluid" id="div-table">
        <div class="row">
            <form-component v-on:listregisters="populatetable"></form-component>
            <div class="col-12 col-sm-9" id="result-table"  v-if="mydata.length > 0">
                <h4 style="color: var(--main-strong-blue)">Horas trabalhadas:</h4>
                <table class="table" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Funcionario:</th>
                        <th scope="col">Data do registro:</th>
                        <th scope="col">Dia e hora de entrada:</th>
                        <th scope="col">Dia e hora da saida:</th>
                        <th scope="col">Horas diurnas:</th>
                        <th scope="col">Horas noturnas:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(register, index) in mydata" :key="register.id">
                        <td>{{register.funcionario}}</td>
                        <td>{{register.inscricao}}</td>
                        <td>{{register.entrada}}</td>
                        <td>{{register.saida}}</td>
                        <td>{{register.diurno}}</td>
                        <td>{{register.noturno}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import formComponent from "./formComponent";

    export default {
        name: 'tableComponente',
        data() {
            return{
                mydata: [],
                funcionario: '',
                inscricao: '',
                entrada: '',
                saida: '',
                diurno: '',
                noturno: '',
            }
        },
        methods:{
            populatetable(data){
                this.mydata = data;
            }
        }


    }
</script>

<style>

    :root {
        --main-strong-blue: #08121e;
        --main-strong-red: #882d24;
    }

    #div-table{
        padding-top: 100px;
    }

    #result-table{
        color: var(--light);
        width: 70vw;
        height: 40vh;
        border-radius: 50px;
        padding: 30px;
        justify-content: center;
    }

</style>
