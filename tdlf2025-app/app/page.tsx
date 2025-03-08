import {
  Header,
  Hero,
  Info,
  NeedToKnow,
  HowToPlay,
  Sponsors,
  Agenda,
  Awards,
  PreFooter,
  Footer,
} from "@/app/components/landing";

export default function Home() {
  return (
    <div className="min-h-screen w-full">
      <Header></Header>
      <Hero></Hero>
      <Info></Info>
      <NeedToKnow></NeedToKnow>
      <HowToPlay></HowToPlay>
      <Sponsors></Sponsors>
      <Awards></Awards>
      <Agenda></Agenda>
      <PreFooter></PreFooter>
      <Footer></Footer>
    </div>
  );
}
