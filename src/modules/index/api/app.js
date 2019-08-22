import Axios from 'axios';

export function checkLogin() {
  return Axios.get('/api/checkLogin');
}

export function wxShare() {
  return Axios.get('/api/jssdk');
}
