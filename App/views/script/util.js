export const wait = function (ms) {
  return new Promise((res) => {
    setTimeout(res, ms);
  });
};
export const slide = function (event, container, items, itemWidth) {
  const prevTrans = container.dataset.translate;
  let newTrans = event.target.classList.contains("next-btn")
  ? Number(prevTrans) - itemWidth
  : Number(prevTrans) + itemWidth;
  const condition = event.target.classList.contains("next-btn")
    ? newTrans >= -itemWidth * (items.length - 2)
    : newTrans <= 0;
  newTrans = condition ? newTrans : 0;
  container.dataset.translate = newTrans;
  container.style.transform = `translateX(${newTrans}px)`;
};
export const sectionObserver = function (callback,threshold) {
  return new IntersectionObserver(callback, {
    root: null,
    threshold,
  });
}

export const tempRecipes = [
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
  {
    img_url: "../../../assets/images/admin.png",
    title: "Spaghetti",
  },
];
