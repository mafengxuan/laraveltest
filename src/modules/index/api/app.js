import Axios from 'axios';

export function checkLogin() {
  return Axios.get('/api/checkLogin');
}
