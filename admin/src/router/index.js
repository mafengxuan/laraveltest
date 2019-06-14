import Vue from 'vue'
import Router from 'vue-router'

// in development-env not use lazy-loading, because lazy-loading too many pages will cause webpack hot update too slow. so only in production use lazy-loading;
// detail: https://panjiachen.github.io/vue-element-admin-site/#/lazy-loading

Vue.use(Router)

/* Layout */
import Layout from '../views/layout/Layout'

/**
* hidden: true                   if `hidden:true` will not show in the sidebar(default is false)
* alwaysShow: true               if set true, will always show the root menu, whatever its child routes length
*                                if not set alwaysShow, only more than one route under the children
*                                it will becomes nested mode, otherwise not show the root menu
* redirect: noredirect           if `redirect:noredirect` will no redirect in the breadcrumb
* name:'router-name'             the name is used by <keep-alive> (must set!!!)
* meta : {
    title: 'title'               the name show in submenu and breadcrumb (recommend set)
    icon: 'svg-name'             the icon show in the sidebar,
  }
**/
export const constantRouterMap = [
  { path: '/login', component: () => import('@/views/login/index'), hidden: true },
  { path: '/404', component: () => import('@/views/404'), hidden: true },

  {
    path: '/',
    component: Layout,
    redirect: '/dashboard',
    children: [{
      path: 'Dashboard',
      name: 'Dashboard',
      component: () => import('@/views/dashboard/index'),
      meta: { title: 'Dashboard', icon: 'dashboard' }
    }]
  },
  {
    path: '/diary',
    component: Layout,
    redirect: '/diary/audit',
    name: 'diary',
    meta: {
      title: '审核日志',
      icon: 'form'
    },
    children: [
      {
        path: 'audit',
        name: 'audit',
        component: () => import('@/views/diary/audit/index'),
        meta: { title: '待审核' }
      },
      {
        path: 'pass',
        name: 'pass',
        component: () => import('@/views/diary/pass/index'),
        meta: { title: '已通过' }
      },
      {
        path: 'overrule',
        name: 'overrule',
        component: () => import('@/views/diary/overrule/index'),
        meta: { title: '被驳回' }
      }
    ]
  },
  {
    path: '/find',
    component: Layout,
    redirect: '/find/banner',
    name: 'find',
    meta: {
      title: '发现链接',
      icon: 'guide'
    },
    children: [
      {
        path: 'banner',
        name: 'banner',
        component: () => import('@/views/find/banner/index'),
        meta: { title: '轮播图' }
      },
      {
        path: 'article',
        name: 'article',
        component: () => import('@/views/find/article/index'),
        meta: { title: '文章' }
      },
      {
        path: 'icon',
        name: 'icon',
        component: () => import('@/views/find/icon/index'),
        meta: { title: '图标' }
      }
    ]
  },
  {
    path: '/ruler',
    component: Layout,
    redirect: '/ruler/set',
    name: 'ruler',
    meta: {
      title: '规则',
      icon: 'component'
    },
    children: [
      {
        path: 'set',
        name: 'set',
        component: () => import('@/views/ruler/set/index'),
        meta: { title: '发表日记申明' }
      },
      {
        path: 'red',
        name: 'red',
        component: () => import('@/views/ruler/red/index'),
        meta: { title: '红包' }
      }
    ]
  },
  {
    path: '/article',
    component: Layout,
    redirect: '/article/content',
    name: 'article',
    meta: {
      title: '文章',
      icon: 'component'
    },
    children: [
      {
        path: 'content',
        name: 'content',
        component: () => import('@/views/article/content/index'),
        meta: { title: '文章' }
      }
    ]
  },
  { path: '*', redirect: '/404', hidden: true }
]

export default new Router({
  // mode: 'history', //后端支持可开
  scrollBehavior: () => ({ y: 0 }),
  routes: constantRouterMap
})
