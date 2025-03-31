import { clsx, type ClassValue } from "clsx";
import { twMerge } from "tailwind-merge";

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}

export function getPlotlyLayoutChart({
  isXaxisVisible = true,
  xAxisTitle = "",
  yAxisTitle = "",
}: {
  isXaxisVisible?: boolean;
  xAxisTitle: string;
  yAxisTitle: string;
}) {
  const layout = {
    template: {
      /* existing template data */
    },
    font: {
      family: "system-ui", // Set font family to Open Sans
      size: 12,
      color: "white",
    },
    // title: {
    //   text: `${titleChart}`,
    //   x: 0.1,
    //   y: 0.9,
    //   yanchor: "top",
    // },
    // annotations: [
    //   {
    //     x: "B",
    //     y: 8.35,
    //     text: "Highest Value",
    //     showarrow: true,
    //     arrowhead: 1,
    //     ax: 0,
    //     ay: -40,
    //   },
    // ],
    // margin: { t: 120 },
    xaxis: {
      visible: isXaxisVisible,
      title: { text: `${xAxisTitle}` },
      showgrid: true,
      gridcolor: "rgba(255, 255, 255, 0.1)",
    },
    yaxis: {
      title: { text: `${yAxisTitle}` },
      showgrid: true,
      gridcolor: "rgba(255, 255, 255, 0.1)",
    },
    images: [
      {
        source: "/logo.png", // URL to a subtle pattern
        xref: "paper",
        yref: "paper",
        x: 1.05,
        y: 1.1,
        sizex: 0.2,
        sizey: 0.2,
        opacity: 0.8, // Make it subtle
        layer: "below",
        xanchor: "right",
        yanchor: "bottom",
      },
    ],
    plot_bgcolor: "rgba(36, 17, 17, 0.8)",
    paper_bgcolor: "#09090b",
  };

  return layout;
}
