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
export { getRandomNumbers };
