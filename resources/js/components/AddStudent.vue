addStudent.vue
<template>
    <div>
        <h3 class="text-center">Add Student</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addStudent">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="student.name">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-control" v-model="student.class">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                student: {}
            }
        },
        methods: {
            addStudent() {

                this.axios
                    .post('http://localhost:8000/api/student/add', this.student)
                    .then(response => (
                        this.$router.push({name: 'student-home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
