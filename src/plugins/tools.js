function getRandomNumbers(max, count, min = 0) {
  let selected = [];
  for (let i = 0; i < count; i++) {
    let no = Math.floor(Math.random() * (max - min + 1) + min);
    if (selected.indexOf(no) === -1) {
      selected.push(no);
    }
  }
  return selected;
}
function uniqueArray(arr) {
  let outputArray = arr.filter(function (v, i, self) {
    return i == self.indexOf(v);
  });

  return outputArray;
}

export { getRandomNumbers, uniqueArray };
