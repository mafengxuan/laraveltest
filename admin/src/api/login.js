import request from '@/utils/request'

export function login(username, password) {
  return request({
    url: '/api/loginAdmin',
    method: 'post',
    data: {
      username,
      password
    }
  })
}

export function getInfo(token) {
  return request({
    url: '/api/userInfo',
    method: 'get',
    params: { token }
  })
}

export function logout() {
  return request({
    url: '/api/loginOut',
    method: 'post'
  })
}
