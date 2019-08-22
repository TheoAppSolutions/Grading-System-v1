<template>
    <select :name="name" class="form-control" title="Account Name">
        <option value="1">ADMINISTRATOR</option>
        <option v-for="varName in listofnames" :value="varName.id" v-text="varName.lastname + ', ' + varName.firstname"
                :selected="varName.id === old"></option>
    </select>
</template>

<script>
    export default {
        props: ['old', 'name'],
        data: function () {
            return {
                listofnames: []
            }
        },
        created() {
            axios.get('/json/accounts.json')
                .then(response => {
                    this.listofnames = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>

<style scoped>

</style>
