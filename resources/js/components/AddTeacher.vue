addTeacher.vue
<template>
    <div>
        <h3 class="text-center">Add Teacher</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addTeacher">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="teacher.name">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-control" v-model="teacher.class">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Teacher</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                teacher: {}
            }
        },
        methods: {
            addTeacher() {

                this.axios
                    .post('http://localhost:8000/api/teacher/add', this.teacher)
                    .then(response => (
                        this.$router.push({name: 'teacher-home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
