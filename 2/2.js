// noinspection PointlessArithmeticExpressionJS

const fs = require('fs');

// 1 paper, 2 scissors, 3 rock
// X loose, Y draw, Z win

const decoder = {
  'A X': 0 + 3,
  'A Y': 3 + 1,
  'A Z': 6 + 2,
  'B X': 0 + 1,
  'B Y': 3 + 2,
  'B Z': 6 + 3,
  'C X': 0 + 2,
  'C Y': 3 + 3,
  'C Z': 6 + 1,
}

const data = fs.readFileSync('data.txt').toString().split(/\n/).filter(n => n);
const result = data.map(game => decoder[game]).reduce((acc, current) => acc + current);

console.log(result);
