const fs = require('fs');

let max = 0;
const data = fs.readFileSync('1.txt').toString().split(/\n/).map(val => val === '' ? null : parseInt(val));

console.log(data)

data.reduce((acc, current) => {
  if (current === null) {
    max = Math.max(acc, max)
    return 0
  }

  return acc + current
}, 0)

console.log(max);
