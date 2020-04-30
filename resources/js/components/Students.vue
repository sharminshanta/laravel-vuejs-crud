<template>
    <div>
        <h3 class="text-center">All students</h3><br/>
        <router-link to="/student/add" class="btn btn-sm btn-info pull-right">Add New</router-link>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.name }}</td>
                <td>{{ student.class }}</td>
                <td>{{ student.created_at }}</td>
                <td>{{ student.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'student-edit', params: { id: student.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteStudent(student.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                students: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/students')
                .then(response => {
                    this.students = response.data;
                });
        },
        methods: {
            deleteStudent(id) {
                this.axios
                    .delete(`http://localhost:8000/api/student/delete/${id}`)
                    .then(response => {
                        let i = this.students.map(item => item.id).indexOf(id); // find index of your object
                        this.students.splice(i, 1)
                    });
            }
        }
    }
</script>
