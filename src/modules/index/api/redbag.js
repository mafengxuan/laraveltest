import Axios from 'axios';

export function getRuler(data) {
  return Axios.get('/api/index/moneyRule');
}

export function getRulerList(data) {
  return Axios.get('/api/index/moneyList');
}
