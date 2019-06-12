import request from '@/utils/request';
import Axios from 'axios';

export function storeSlideArticle(data) {
  return Axios.post('/api/admin/discovery/storeSlideArticle',data);
}

//add页面添加图片
export function uploadImage(params) {
  return Axios.post('/api/uploadImage',params);
}

export function showList(id) {
  return request({
    url: '/api/admin/discovery/showList/'+id,
    method: 'get'
  });
}

export function updateData(id,params) {
  return Axios.post('/api/admin/discovery/update/'+id,params);
}

export function destory(id) {
  return Axios.post('/api/admin/discovery/destroy/'+id);
}
