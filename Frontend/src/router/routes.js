import DashboardLayout from "@/layout/dashboard/DashboardLayout.vue";
// GeneralViews
import NotFound from "@/pages/NotFoundPage.vue";

// Admin pages
import Dashboard from "@/pages/Dashboard.vue";
import Pizza from "@/pages/Pizza.vue";
import Offers from "@/pages/Offers.vue";
import Burger from "@/pages/Burger.vue";

const routes = [
  {
    path: "/",
    component: DashboardLayout,
    redirect: "/pizza",
    children: [
      {
        path: "dashboard",
        name: "dashboard",
        component: Dashboard
      },
      {
        path: "pizza",
        name: "pizza",
        component: Pizza
      },
      {
        path: "offers",
        name: "offers",
        component: Offers
      },
      {
        path: "burger",
        name: "buger",
        component: Burger
      }
    ]
  },
  { path: "*", component: NotFound }
];

export default routes;
