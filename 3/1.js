const fs = require('fs');

const data = fs.readFileSync('data.txt').toString().split(/\n/).filter(n => n);

const scoring = Object.fromEntries([
  ...[...Array(26).keys()].map(i => [String.fromCharCode(i + 97), ++i]),
  ...[...Array(26).keys()].map(i => [String.fromCharCode(i + 65), ++i + 26]),
])

const intersect = data.map(items => items.slice(0, items.length / 2).split('').filter(item => items.slice(-(items.length / 2)).split('').includes(item)).pop());

const result = intersect.reduce((acc, current) => acc + scoring[current], 0);

console.log(result);
