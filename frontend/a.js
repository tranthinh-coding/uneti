
let a = [
  {
    "ten_lop_hoc_phan": "Cơ sở dữ liệu Tin 14A6",
    "ma_khoa": "1",
    "ma_lop_hoc_phan": "8",
    "ten_khoa": "Công nghệ thông tin",
    "ten_lop_bien_che": "Tin 14A6 "
  },
  {
    "ten_lop_hoc_phan": "Vật lý Tin14A6",
    "ma_khoa": "2",
    "ma_lop_hoc_phan": "13",
    "ten_khoa": "Kế toán",
    "ten_lop_bien_che": "Tin 14A6 "
  },
  {
    "ten_lop_hoc_phan": "Toán rời rạc Tin14A6",
    "ma_khoa": "1",
    "ma_lop_hoc_phan": "14",
    "ten_khoa": "Công nghệ thông tin",
    "ten_lop_bien_che": "Tin 14A5"
  }
]
let b = {
  "1": [
    {
      "ten_lop_hoc_phan": "Cơ sở dữ liệu Tin 14A6",
      "ma_khoa": "1",
      "ma_lop_hoc_phan": "8",
      "ten_khoa": "Công nghệ thông tin",
      "ten_lop_bien_che": "Tin 14A6 "
    },
    {
      "ten_lop_hoc_phan": "Toán rời rạc Tin14A6",
      "ma_khoa": "1",
      "ma_lop_hoc_phan": "14",
      "ten_khoa": "Công nghệ thông tin",
      "ten_lop_bien_che": "Tin 14A5"
    }
  ],
  "2": [
    {
      "ten_lop_hoc_phan": "Vật lý Tin14A6",
      "ma_khoa": "2",
      "ma_lop_hoc_phan": "13",
      "ten_khoa": "Kế toán",
      "ten_lop_bien_che": "Tin 14A6 "
    },
  ]
}

// neu ton tai hoac ton tai nhung lai la 0
// neu khong ton tai, va khac 0
let fnal = a.reduce((obj, currData) => {
    if (!obj[currData['ma_khoa']] && obj[currData['ma_khoa']] != 0) {
      obj[currData['ma_khoa']] = [];
    } 
    obj[currData['ma_khoa']].push(currData);
    return obj;

}, {})

console.log(fnal);