import Axios from 'axios';

export function checkLogin() {
  return Axios.get('/api/checkLogin');
}

export function wxShare(data) {
  return Axios.post('/api/jssdk',data);
}
