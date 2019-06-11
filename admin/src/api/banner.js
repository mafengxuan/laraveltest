import request from '@/utils/request';

export function articleList(data) {
  console.log(data);
  return request({
    url: '/api/admin/discovery/storeSlideShow',
    method: 'post',
    data: data
  });
}

export function showList(id) {
  return request({
    url: '/api/admin/discovery/showList/'+id,
    method: 'get'
  });
}
