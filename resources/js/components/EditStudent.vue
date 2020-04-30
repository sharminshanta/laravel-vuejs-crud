<template>
    <div>
        <h3 class="text-center">Edit Student</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateStudent">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="student.name">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-control" v-model="student.class">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Student</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/student/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.student = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateStudent() {
                this.axios
                    .post(`http://localhost:8000/api/student/update/${this.$route.params.id}`, this.student)
                    .then((response) => {
                        this.$router.push({name: 'student-home'});
                    });
            }
        }
    }
</script>
