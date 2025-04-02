"use client";
import { getPlotlyLayoutChart } from "@/app/lib/utils";
import { useEffect, useRef } from "react";
import type { PlotData, Layout } from "plotly.js";

// type DataChart = {
//   marker: {
//     color: string;
//     cornerradius?: number;
//   };
//   text: number[];
//   x: string[];
//   y: number[];
//   type: PlotlyTraceType;
//   textposition?: string;
// };

type BarChartProps = {
  dataChart: PlotData[];
  titleChart: string;
  xAxisTitle: string;
  yAxisTitle: string;
  children: React.ReactNode;
};

export default function BarChart({
  dataChart,
  titleChart,
  xAxisTitle,
  yAxisTitle,
  children,
}: BarChartProps) {
  const chartRef = useRef(null);

  useEffect(() => {
    async function renderPlot() {
      if (chartRef.current) {
        const layout: Partial<Layout> = getPlotlyLayoutChart({
          xAxisTitle,
          yAxisTitle,
        });
        const config = {
          responsive: true,
          scrollZoom: true,
          displayModeBar: false,
          transition: { duration: 500, easing: "cubic-in-out" },
        };

        const Plotly = (await import("plotly.js-dist-min")).default;
        Plotly.newPlot(chartRef.current, dataChart, layout, config);
      }
    }

    renderPlot();
  }, [dataChart, titleChart, xAxisTitle, yAxisTitle]);

  return (
    <article className="rounded-2xl bg-[#09090b] p-4 xs:p-6 border border-gray-600">
      <h3 className="text-center xs:text-start font-bold text-2xl sm:text-3xl mb-4">
        {titleChart}
      </h3>
      {children}
      <div ref={chartRef} className="rounded-2xl [&>svg:w-ful]"></div>
    </article>
  );
}
