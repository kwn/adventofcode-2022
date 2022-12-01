const fs = require('fs');

const data = fs.readFileSync('data.txt').toString().split(/\n/).map(val => val === '' ? null : parseInt(val));
const cals = [];

data.reduce((acc, current) => current === null ? cals.push(acc) && 0 : acc + current, 0);

const top3 = cals.sort().slice(-3).reduce((acc, curr) => acc + curr);

console.log(top3);
