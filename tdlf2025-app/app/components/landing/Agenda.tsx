"use client";
import { Container, CardTime } from "@/app/components/landing";
import agendaData from "@/app/data/agenda.json";
import { useEffect, useRef } from "react";

export default function Agenda() {
  const agendaListRef = useRef<HTMLUListElement | null>(null);

  useEffect(() => {
    const listItems = agendaListRef.current?.children;
    if (listItems) {
      Array.from(listItems).forEach((itemAgenda, index) => {
        if (itemAgenda instanceof HTMLElement) {
          itemAgenda.style?.setProperty("--index-agenda", `${index + 1}`);
        }
      });
    }
  }, []);

  return (
    <section className="my-60" id="agenda">
      <Container>
        <div className="flex items-center justify-between">
          <h3 className="text-5xl font-bold">Agenda</h3>
          <div className="space-x-5">
            <span>23 de Marzo de 2025</span>
            <button className="cursor-pointer">Agenda tu Calendario</button>
          </div>
        </div>

        <ul
          className="animation__scroll-in mt-16 grid gap-y-8 justify-center px-5"
          ref={agendaListRef}
        >
          {agendaData.map((item) => {
            return (
              <li key={item.title}>
                <div className="backdrop-blur-sm">
                  <CardTime
                    title={item.title}
                    time={item.time}
                    copy={item.copy}
                  />
                </div>
              </li>
            );
          })}
        </ul>
      </Container>
    </section>
  );
}
