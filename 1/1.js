const fs = require('fs');

let max = 0;
const data = fs.readFileSync('data.txt').toString().split(/\n/).map(val => val === '' ? null : parseInt(val));

data.reduce((acc, current) => current === null ? (max = Math.max(acc, max)) && 0 : acc + current, 0);

console.log(max);
