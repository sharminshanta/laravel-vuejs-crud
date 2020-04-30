import LandingPage from './components/Home.vue';
import AllStudents from './components/Students.vue';
import AddStudent from './components/AddStudent.vue';
import EditStudent from './components/EditStudent.vue';
import AllTeachers from './components/Teachers.vue';
import AddTeacher from './components/AddTeacher.vue';
import EditTeacher from './components/EditTeacher.vue';

export const routes = [
    {
        /**
         * Landing Page Portion
         */
        name: 'home',
        path: '/',
        component: LandingPage
    },

    /**
     * Student Portion
     */
    {
        name: 'student-home',
        path: '/students',
        component: AllStudents
    },
    {
        name: 'student-add',
        path: '/student/add',
        component: AddStudent
    },
    {
        name: 'student-edit',
        path: '/student/edit/:id',
        component: EditStudent
    },

    /**
     * Teacher Portion
     */
    {
        name: 'teacher-home',
        path: '/teachers',
        component: AllTeachers
    },
    {
        name: 'teacher-add',
        path: '/teacher/add',
        component: AddTeacher
    },
    {
        name: 'teacher-edit',
        path: '/teacher/edit/:id',
        component: EditTeacher
    },
];
