const ctg_ptr = {
  1: [
    {
      S: [["ptr_1"], ["ptr_2"]],
      ptr_1: [["mA_2", "vrb_better", "pro_your", "noun_situation"]],
      ptr_2: [["mA_2", "vrb_better", "pro_your", "noun_situation", "adPhr_1"]],
    },
  ],
};

const mA_1 = [["May Allah"]];
const mA_2 = [["May Allah Taala"], ["May Allah the Almighty"]];
const mA_3 = [["May Allah"], ["May Allah Taala"], ["May Allah the Almighty"]];

const ptr_1 = [["mA_2", "vrbb_better", "pro_your", "noun_situation"]];
const ptr_2 = [["mA_2", "vr_better", "pro_your", "noun_situation", "adPhr_1"]];

const vrb_better = [["better"], ["improve"]];

const noun_situation = [["circumstances"], ["situation"]];

const pro_your = [["your"]];
const pro_with = [["you with"]];

const adPhr_1 = [
  ["by His sheer mercy"],
  ["by His sheer grace"],
  ["by His sheer grace and mercy"],
];

function partPhrase(ctgNo, ctgStart = "S") {
  let start = ctgStart;
  let expansion = [];
  let rules = {};
  let rndObj = ctg_ptr[ctgNo].filter((p) => p[ctgStart]); //random selection of object corresponding category
  console.log(rndObj);
  let filtered = rndObj[Math.floor(Math.random() * Object.keys(rndObj).length)];
  console.log(filtered);
  //shallow copy of object
  rndObjVal = Object.assign({}, filtered);
  console.log(rndObjVal);

  for (let key in rndObjVal) {
    split = rndObjVal[key];
    for (let i in split) {
      for (let j in split[i]) {
        ary = split[i][j];
        rndObjVal[ary] = eval(ary);
      }
    }
  }

  //recursive function for context free grammar
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

test = partPhrase(1);
console.log(test);
