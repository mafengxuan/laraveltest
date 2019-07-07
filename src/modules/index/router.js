const Home = () => import(/* webpackChunkName: "index/Home" */ './containers/home.vue');
const Messages = () => import(/* webpackChunkName: "index/Messages" */ './containers/messages.vue');
const Find = () => import(/* webpackChunkName: "index/Find" */ './containers/find.vue');
const Personal = () => import(/* webpackChunkName: "index/Personal" */ './containers/personal.vue');
const Detail = () => import(/* webpackChunkName: "index/Detail" */ './containers/detail.vue');
const Add = () => import(/* webpackChunkName: "index/Add" */ './containers/add.vue');
const NewAdd = () => import(/* webpackChunkName: "index/Add" */ './containers/newAdd.vue');
const EditDetail = () => import(/* webpackChunkName: "index/Add" */ './containers/editDetail');
const BagRuler = () => import(/* webpackChunkName: "index/Add" */ './containers/bagRuler.vue');

export default [
  {
    path: "/",
    title: "Home",
    component: Home
  },
  {
    path: "/Home",
    title: "Home",
    component: Home
  },
  {
    path: "/Messages",
    title: "Messages",
    component: Messages
  },
  {
    path: "/Find",
    title: "Find",
    component: Find
  },
  {
    path: "/Personal",
    title: "Personal",
    component: Personal
  },
  {
    path: "/Detail",
    title: "Detail",
    component: Detail
  },
  {
    path: "/Add",
    title: "Add",
    component: Add
  },
  {
    path: "/NewAdd",
    title: "NewAdd",
    component: NewAdd
  },
  {
    path: "/EditDetail",
    title: "EditDetail",
    component: EditDetail
  },
  {
    path: "/BagRuler",
    title: "BagRuler",
    component: BagRuler
  }
];
