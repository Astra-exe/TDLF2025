"use client";
import { Container, CardTime } from "@/app/components/landing";
import agendaData from "@/app/data/agenda.json";
import { useEffect, useRef } from "react";
import styles from "@/app/styles/landing.module.css";

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
    <section className="mt-48 lg:my-60" id="agenda">
      <Container>
        <div className="flex flex-col xs:flex-row gap-y-2.5 items-center justify-between">
          <h3 className="font-bold text-4xl sm:text-5xl lg:text-6xl">Agenda</h3>
          <div className="space-x-5">
            <span>23 de Marzo de 2025</span>
            {/* <button className="cursor-pointer">Agenda tu Calendario</button> */}
          </div>
        </div>

        <ul
          className={`${styles.animation__scrollin} mt-8 sm:mt-16 grid gap-y-5 sm:gap-y-8 justify-center px-5`}
          ref={agendaListRef}
        >
          {agendaData.map((item) => {
            return (
              <li key={item.title} className="sm:top-[5vh] top-[15vh]">
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
