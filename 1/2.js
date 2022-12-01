const fs = require('fs');

const data = fs.readFileSync('data.txt').toString().split(/\n/).map(val => val === '' ? null : parseInt(val));
const cals = [];

console.log(data)

data.reduce((acc, current) => {
  if (current === null) {
    cals.push(acc)
    return 0
  }

  return acc + current
}, 0)

const top3 = cals.sort().slice(-3).reduce((acc, curr) => acc + curr);

console.log(top3);
