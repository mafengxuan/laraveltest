import request from '@/utils/request';
import Axios from 'axios';

export function storeSlideShow(data) {
  return Axios.post('/api/admin/discovery/storeSlideShow',data);
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
  return Axios.put('/api/admin/discovery/update/'+id,params);
}
