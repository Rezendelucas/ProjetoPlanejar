<template>

        <div class="col-12 col-sm-3" id="form-table">
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


</template>

<script>
    import tableComponent from "./tableComponent";

    export default {
        name: 'formComponente',
        components:{
            tableComponent
        },
        data() {
            return{
                nameFunc: '',
                hourEnter: '',
                hourExit: '',
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
                        console.log(response.data)

                        //joga pro outro componente
                        this.$emit('listregisters',response.data);
                        //this.mydata = response.data;

                    })
                    .catch(error => {
                        console.log(error);
                        console.log("Erro disparado!");
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

    .mybutton{
        background-color: var(--main-strong-red);
        border-radius: 50px;
        padding: 5px 20px;
        border: 5px;
        color: var(--light);
        text-decoration: none;
        cursor: pointer;
    }

    #form-table{
        padding: 30px;
    }

</style>
