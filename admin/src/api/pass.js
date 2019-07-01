import Axios from 'axios';

export function articleList(data) {
  return Axios.get('/api/admin/articleList/'+data.type+'?nickname='+data.nickname+'&sDate='+data.sDate+'&eDate='+data.eDate);
}

export function orderTop(data) {
  return Axios.post('/api/admin/orderTop/'+data.id,{
    order: data.order
  });
}

export function quality(data) {
  return Axios.post('/api/admin/quality/'+data.id,{
    isQuality: data.quality
  });
}

export function online(data) {
  return Axios.post('/api/admin/online/'+data.id,{
     isOnline: data.online
  });
}

export function getRedBagList(data) {
  return Axios.get('/api/admin/moneyList/'+data.id);
}

export function sendRedBag(data) {
  return Axios.post('/api/admin/money/store',data);
}
