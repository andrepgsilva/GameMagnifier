import Login from './views/Login';
import Register from './views/Register';
import Home from './views/Home';

const routes = [
  {
    path: '/',
    name: 'login',
    component: Login,
    meta: {
      requiresVisitor: true,
    },
  },

  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      requiresVisitor: true,
    },
  },

  {
    path: '/home',
    name: 'home',
    component: Home,
    meta: {
      requiresAuth: true,
    },
  }
]

export default routes;