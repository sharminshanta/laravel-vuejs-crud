<template>
    <div>
        <h3 class="text-center">All Teachers</h3><br/>
        <router-link to="/teacher/add" class="btn btn-sm btn-info pull-right">Add New</router-link>

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
            <tr v-for="teacher in teachers" :key="teacher.id">
                <td>{{ teacher.id }}</td>
                <td>{{ teacher.name }}</td>
                <td>{{ teacher.class }}</td>
                <td>{{ teacher.created_at }}</td>
                <td>{{ teacher.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'teacher-edit', params: { id: teacher.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteTeacher(teacher.id)">Delete</button>
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
                teachers: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/teachers')
                .then(response => {
                    this.teachers = response.data;
                });
        },
        methods: {
            deleteTeacher(id) {
                this.axios
                    .delete(`http://localhost:8000/api/teacher/delete/${id}`)
                    .then(response => {
                        let i = this.teachers.map(item => item.id).indexOf(id); // find index of your object
                        this.teachers.splice(i, 1)
                    });
            }
        }
    }
</script>
