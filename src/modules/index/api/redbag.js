import Axios from 'axios';

export function getRuler(data) {
  return Axios.get('/api/index/rule/show/2');
}
