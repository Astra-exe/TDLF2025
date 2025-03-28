export default function HeaderMap({ content }: { content: string }) {
  return <div dangerouslySetInnerHTML={{ __html: content }} />;
}
