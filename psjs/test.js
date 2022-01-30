let ctgnum = 1;
let sentence = [];
let selectionOfCtg = [];
let component = [];
let lastCtg = [];
const mA = ["May Allah Taala", "May Allah the Almighty"];

function partPhrase(ctgNo, ctgStart = "S") {
  // debugger;
  let start = ctgStart;
  let expansion = [];
  let rules = {};
  let rndObj = ctg_ptr[ctgNo].filter((p) => p[ctgStart]);
  let filtered = rndObj[Math.floor(Math.random() * Object.keys(rndObj).length)];

  rndObjVal = Object.assign({}, filtered);

  for (let key in rndObjVal) {
    split = rndObjVal[key];
    for (let i in split) {
      for (let j in split[i]) {
        ary = split[i][j];
        rndObjVal[ary] = eval(ary);
      }
    }
  }

  rules = rndObjVal;

  console.log(rules);

  let result = expand(start, expansion);

  function expand(start, expansion) {
    if (rules[start]) {
      let pick = rules[start][Math.floor(Math.random() * rules[start].length)];
      for (let i = 0; i < pick.length; i++) {
        expand(pick[i], expansion);
      }
    } else {
      expansion.push(start);
    }
    return expansion.join(" ");
  }
  return result;
}

for (let i = 0; i < ctg_assoc[ctgnum].length; i++) {
  value =
    ctg_assoc[ctgnum][i][
      Math.floor(Math.random() * Object.values(ctg_assoc[ctgnum][i]).length)
    ];
  selectionOfCtg.push(value);
}

console.log(selectionOfCtg);

rndInt5 = Math.floor(Math.random() * 6) + 1;
combNo = Object.values(phr_comb[rndInt5]);
numOfPhrases = combNo.reduce((a, b) => a + b, 0);

console.log(combNo);
console.log(numOfPhrases);

selection_mA = mA[Math.floor(Math.random() * mA.length)];

sent_type = Object.keys(ctg_ptr[ctgnum][0]);
console.log(sent_type);

let arr = [];
let dupl_arr = [];
h = 0;
for (let e of selectionOfCtg) {
  console.log(e);
  len = Object.keys(ctg_ptr[e]).length;
  for (let f = 0; f < len; f++) {
    arr.push(Object.keys(ctg_ptr[e][f]));
  }
  dupl_arr[h] = arr;
  h++;
}
console.log(dupl_arr);

let uni_arr = [];
let uni_arry = [];
for (let e of selectionOfCtg) {
  len = Object.keys(ctg_ptr[e]).length;
  for (let f = 0; f < len; f++) {
    uni_arr.push(Object.keys(ctg_ptr[e][f]));
  }
  uni_arry.push(uni_arr.flat());
  uni_arr = [];
}

result = uni_arry.reduce((p, c) => p.filter((e) => c.includes(e)));

let unique_sent_type = result.filter(function (elem, index, self) {
  return index === self.indexOf(elem);
});

console.log(unique_sent_type);

selection_sent_type =
  unique_sent_type[Math.floor(Math.random() * unique_sent_type.length)];

console.log(selection_mA);
console.log(selection_sent_type);

let n = 0;
while (n < 3) {
  if (sentence.length == 0) {
    if (combNo[n] === 1) {
      ctgnum = selectionOfCtg[n];
      component = partPhrase(ctgnum);
      sentence.push(selection_mA + " " + component + ".");
      lastCtg.push(ctgnum);
    } else if (combNo[n] === 2) {
      ctgnum = selectionOfCtg[n];
      ctgnum2 = selectionOfCtg[n + 1];
      component = partPhrase(ctgnum);
      component2 = partPhrase(ctgnum2);
      sentence.push(
        selection_mA + " " + component + " and " + component2 + "."
      );
      lastCtg.push(ctgnum, ctgnum2);
    }
  } else if (sentence.length === 1) {
    numOflastCtg = lastCtg.length;
    switch (selection_sent_type) {
      case "S":
        pick_sent_type = "May He";
        break;
      case "May":
        pick_sent_type = "May";
        break;
      case "You":
        pick_sent_type = "May you";
        break;
      case "Your":
        pick_sent_type = "May your";
        break;
    }
    if (combNo[n] === 1) {
      ctgnum = selectionOfCtg[numOflastCtg];
      component = partPhrase(ctgnum, selection_sent_type);
      sentence.push(pick_sent_type + " " + component + ".");
      lastCtg.push(ctgnum);
    } else if (combNo[n] === 2) {
      ctgnum = selectionOfCtg[numOflastCtg];
      ctgnum2 = selectionOfCtg[numOflastCtg + 1];
      component = partPhrase(ctgnum, selection_sent_type);
      component2 = partPhrase(ctgnum2, selection_sent_type);
      sentence.push(
        pick_sent_type + " " + component + " and " + component2 + "."
      );
      lastCtg.push(ctgnum, ctgnum2);
    }
  } else if (sentence.length === 2) {
    numOflastCtg = lastCtg.length;
    if (combNo[n] === 1) {
      ctgnum = selectionOfCtg[numOflastCtg];
      component = partPhrase(ctgnum);
      sentence.push(selection_mA + " " + component + ".");
      lastCtg.push(ctgnum);
    } else if (combNo[n] === 2) {
      ctgnum = selectionOfCtg[numOflastCtg];
      ctgnum2 = selectionOfCtg[numOflastCtg + 1];
      component = partPhrase(ctgnum);
      component2 = partPhrase(ctgnum2);
      sentence.push("May Allah " + component + " and " + component2 + ".");
      lastCtg.push(ctgnum, ctgnum2);
    }
  }
  n++;
}

let phr_1 = sentence.join(" ");

document.getElementById("demo").innerHTML = phr_1;

const t1 = performance.now();

console.log(`Call to doSomething took ${t1 - t0} milliseconds.`);
