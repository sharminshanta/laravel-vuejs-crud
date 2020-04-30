<template>
    <div>
        <h3 class="text-center">Edit teacher</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateTeacher">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="teacher.name">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-control" v-model="teacher.class">
                    </div>
                    <button type="submit" class="btn btn-primary">Update teacher</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/teacher/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.teacher = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateTeacher() {
                this.axios
                    .post(`http://localhost:8000/api/teacher/update/${this.$route.params.id}`, this.teacher)
                    .then((response) => {
                        this.$router.push({name: 'teacher-home'});
                    });
            }
        }
    }
</script>
