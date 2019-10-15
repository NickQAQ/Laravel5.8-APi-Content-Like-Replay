<template>
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Note Component</div>

                    <div class="card-body">
                        Note
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    export default {
        name: "Note",
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>

</style>
