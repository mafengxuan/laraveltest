import request from '@/utils/request';

export function articleList(status) {
  return request({
    url: '/api/admin/articleList/'+status,
    method: 'get'
  })
}
